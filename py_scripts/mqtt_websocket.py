#!/usr/bin/env python
# coding: utf-8

# In[5]:


from numpy import random
from datetime import datetime
import paho.mqtt.client as paho
import LSD
import cv2
import json
import base64
import time
import os

#connect to mqtt
broker = "broker.hivemq.com"
port = 8000

def on_publish(client, userdata, mid):
    print("data published mid = ", mid,"\n")
    pass

def on_disconnect(client,userdata,rc):
    if rc != 0:
        print("Unexpected MQTT disconnection. Will auto-reconnect")
        
client = paho.Client("client-socks", transport="websockets",clean_session=False)
client.connect(broker, port, keepalive=60)
client.on_publish = on_publish
client.on_disconnect = on_disconnect

#Generate sensor
tds = random.normal(loc=1200, scale = 150, size = 500) #mean, sd, arr_size
turbidity = random.normal(loc = 15, scale = 4, size = 500)
temp = random.normal(loc = 24, scale = 4, size = 500)
humidity = random.normal(loc = 65, scale = 3, size = 500)

now = datetime.now()
for i in range(500):
    if (i+1) % 100 == 0:
        client.disconnect()
        client.connect(broker, port, keepalive=60)
    
    elif (now.hour == 19 and now.minute == 1 and now.second == 0): 
        #take picture
        cap = cv2.VideoCapture(0)  
        ret,frame = cap.read() 
        filename = 'Assets/'+datetime.today().strftime('%Y-%m-%d-%H-%M-%S')+'.jpg'
        while(True):
            cv2.imwrite(filename,frame)
            cv2.destroyAllWindows()
            break

        cap.release()
        
        #Prediction
        prediction = LSD.leaf_spot_disease(filename)
        
        #convert array (opencv) to bytes (db)
        with open(filename, 'rb') as img:
            img_read = img.read()
            img_encode = base64.encodebytes(img_read)
            img_string = img_encode.decode("utf-8") #JSON only take str, so convert to string

        #convert to JSON
        images = {'filename':filename,
                 'bytes':img_string,
                  'leaf_prediction':prediction
                 }
        images_json = json.dumps(images) #js not take dict
        
        #remove current file
        os.remove(filename)
        
        sensors = {'tds':tds[i],
          'turbidity':turbidity[i],
          'temp':temp[i],
          'humidity':humidity[i]
          }
        sensors_json = json.dumps(sensors)

        client.publish('hydrovest/sensor',sensors_json)
        client.publish('hydrovest/leaf_image',images_json)
        time.sleep(4)
            
    else:
        sensors = {'tds':tds[i],
          'turbidity':turbidity[i],
          'temp':temp[i],
          'humidity':humidity[i]
          }

        sensors_json = json.dumps(sensors)
        
        client.publish('hydrovest/sensors',sensors_json)
        time.sleep(4)

