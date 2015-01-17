# -*- coding: utf-8 -*-
"""
Created on Sun Jan 26 14:24:43 2014
 
@author: pi
"""
 
import RPi.GPIO as gpio
import time
import os,sys
gpio.setwarnings(False)
gpio.setmode(gpio.BOARD)
time.sleep(1)
data=[]
def delay(i): #20*i usdelay
    a=0
    for j in range(i):
        a+1
j=0
#start work
gpio.setup(13,gpio.OUT)
#gpio.output(12,gpio.HIGH)
#delay(10)
gpio.output(13,gpio.LOW)
time.sleep(0.018)
gpio.output(13,gpio.HIGH)
i=1
  
#wait to response
gpio.setup(13,gpio.IN)
 
 
while gpio.input(13)==1:
    continue
 
 
while gpio.input(13)==0:
    continue
 
while gpio.input(13)==1:
        continue
#get data
 
while j<40:
    k=0
    while gpio.input(13)==0:
        continue
     
    while gpio.input(13)==1:
        k+=1
        if k>100:break
    if k<3:
        data.append(0)
    else:
        data.append(1)
    j+=1
 
print "Sensor is working"
#get temperature
humidity_bit=data[0:8]
humidity_point_bit=data[8:16]
temperature_bit=data[16:24]
temperature_point_bit=data[24:32]
check_bit=data[32:40]
 
humidity=""
humidity_point=""
temperature=""
temperature_point=""
check=""

for i in range(0,8):
    #humidity+=humidity_bit[i]*2**(7-i)
    #humidity_point+=humidity_point_bit[i]*2**(7-i)
    #temperature+=temperature_bit[i]*2**(7-i)
    #temperature_point+=temperature_point_bit[i]*2**(7-i)
    #check+=check_bit[i]*2**(7-i)
    humidity+=str(humidity_bit[i])
    humidity_point+=str(humidity_point_bit[i])
    temperature+=str(temperature_bit[i])
    temperature_point+=str(temperature_point_bit[i])
    check+=str(check_bit[i])
humidity=int(humidity,2)
humidity_point=int(humidity_point,2)
temperature=int(temperature,2)
temperature_point=int(temperature_point,2)
check=int(check,2)
 
tmp=humidity+humidity_point+temperature+temperature_point
if check==tmp:
    print temperature,humidity/2
    f = open("./data/c.txt",'w')
    f.write(str(temperature))
    f.write(str("."))
    f.write(str(temperature_point))
    f.close()
    f = open('./data/h.txt','w')
    f.write(str(humidity/2))
    f.write(".")
    f.write(str(humidity_point/2))
    f.close()
    print test
else:
    print "err",humidity,humidity_point,temperature,temperature_point,check
exit()