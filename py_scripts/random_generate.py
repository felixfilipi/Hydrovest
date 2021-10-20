from numpy import random
import matplotlib.pyplot as plt
import seaborn as sns

arr = random.normal(loc=1200, scale=150, size=500)
#arr = random.normal(loc=15, scale=4, size=500)
#arr = random.normal(loc=24, scale=4, size=500)
#arr = random.normal(loc=65, scale=3, size=500)
print(arr)
sns.distplot(arr, hist = False)
plt.show()
