var clientId = generateClientId(8);

const options = {
    keepalive: 60,
	clean: true,
    connectTimeout: 4000,
    reconnectPeriod: 1000,
    will: {
      topic: 'WillMsg',
      payload: 'Connection Closed abnormally!',
      qos: 0,
      retain: false
    },
    // Auth
    clientId: clientId,
    username: 'hivemq_test',
}

const client  = mqtt.connect('ws://broker.hivemq.com:8000/mqtt', options);
client.on('connect', function () {
  console.log('Connected! Client Id = ' + clientId);
  changeConnectionStatus(1)

  client.subscribe('hydrovest/tds_sensor', function (err) {});
  client.subscribe('hydrovest/turbidity_sensor', function (err) {});
  client.subscribe('hydrovest/temperature_sensor', function (err) {});
  client.subscribe('hydrovest/humidity_sensor', function (err) {});
});

client.on('error', function (err) {
  console.log('Connection error: ', err);
  client.end();
  changeConnectionStatus(0)
});

client.on('reconnect', function () {
  console.log('Reconnect..');
  changeConnectionStatus(-1)
});

// mqtt on message
client.on('message', function (topic, message) {
  // message is Buffer
  topic_str = topic.toString();
  message_str = message.toString();

  if(topic_str == "hydrovest/tds_sensor"){
    message_value = parseFloat(message_str);
    console.log("Incoming data = tds_sensor = " + message_value);
    updateSensor(gauge_tds, chart_tds, message_value);
    
    if(message_value <= 500){
      updateStatus("tds", 2);
      updateModal("tds", -1);
    }else if(message_value > 500 && message_value <= 1000){
      updateStatus("tds", 1);
      updateModal("tds", -1);
    }else if(message_value > 1000 && message_value <= 1500){
      updateStatus("tds", 0);
      updateModal("tds", 0);
    }else{
      updateStatus("tds", 2);
      updateModal("tds", 1);
    }

  }else if(topic_str == "hydrovest/turbidity_sensor"){
    message_value = parseFloat(message_str);
    console.log("Incoming data = do_sensor = " + message_value);
    updateSensor(gauge_turbidity, chart_turbidity, message_value);

    if(message_value < 5){
      updateStatus("turbidity", 2);
      updateModal("turbidity", -1);
    }else if(message_value > 5 && message_value < 10){
      updateStatus("turbidity", 1);
      updateModal("turbidity", -1);
    }else if(message_value > 10 && message_value <= 20){
      updateStatus("turbidity", 0);
      updateModal("turbidity", 0);
    }else if(message_value > 20 && message_value < 24){
      updateStatus("turbidity", 1);
      updateModal("turbidity", 1);
    }else if(message_value > 24){
      updateStatus("turbidity", 2);
      updateModal("turbidity", 1);
    }

  }else if(topic_str == "hydrovest/temperature_sensor"){
    message_value = parseFloat(message_str);
    console.log("Incoming data = temperature_sensor = " + message_value);
    updateSensor(gauge_temperature, chart_temperature, message_value);
    
    if(message_value < 15){
      updateStatus("temperature", 2);
      updateModal("temperature", -1);
    }else if(message_value > 15 && message_value < 20){
      updateStatus("temperature", 1);
      updateModal("temperature", -1);
    }else if(message_value > 20 && message_value <= 30){
      updateStatus("temperature", 0);
      updateModal("temperature", 0);
    }else if(message_value > 30 && message_value < 33){
      updateStatus("temperature", 1);
      updateModal("temperature", 1);
    }else if(message_value > 33){
      updateStatus("temperature", 2);
      updateModal("temperature", 1);
    }

  }else if(topic_str == "hydrovest/humidity_sensor"){
    message_value = parseFloat(message_str);
    console.log("Incoming data = humidity_sensor = " + message_value);
    updateSensor(gauge_humidity, chart_humidity, message_value);

    if(message_value < 55){
      updateStatus("humidity", 2);
      updateModal("humidity", -1);
    }else if(message_value > 55 && message_value < 60){
      updateStatus("humidity", 1);
      updateModal("humidity", -1);
    }else if(message_value > 60 && message_value <= 70){
      updateStatus("humidity", 0);
      updateModal("humidity", 0);
    }else if(message_value < 70 && message_value < 73){
      updateStatus("humidity", 1);
      updateModal("humidity", 1);
    }else if(message_value > 73){
      updateStatus("humidity", 2);
      updateModal("humidity", 1);
    }

  }
})
