#!/usr/bin/python
# Author : CodeLive
# Date   : 09/03/2014


# Import required Python libraries
import time
import RPi.GPIO as GPIO
import os,sys
import shutil
import datetime


GPIO.setmode(GPIO.BOARD)


# Define GPIO to use on Pi
GPIO_IN  = 11
GPIO_OUT = 12


print "Light Control Server @ CodeLive"

#GPIO.cleanup()
	## Set pins as output and input
GPIO.setup(GPIO_IN, GPIO.IN)
GPIO.setup(GPIO_OUT, GPIO.OUT)
#//BT3 = os.system("head ../data/bt3.txt -n 1")
f= open ("../data/bt3.txt")           
BT3 = f.readline()
f.close()


while (BT3 != "0"):
        inValue = GPIO.input(GPIO_IN)
	print(inValue)
        if inValue != 0:
                print("Light Power ON")
		f= open ("../data/bt3.txt")           
		BT3 = f.readline()
		f.close()
		print(BT3)
		if (BT3 != "0"):
			getTime = str(datetime.datetime.today())[:19]
			
			shutil.copyfile("../img/pic.jpg", "../img/pic"+getTime+".jpg")
			
	  		os.system("sudo fswebcam -d /dev/video0 -r 320x240  --jpeg 85 --shadow --title 'Ivans RasPiCam' --subtitle 'For Monitor' --info 'Ivan' -q --timestamp '%Y-%m-%d %H:%M:%S' --save ../img/pic.jpg")        
     			GPIO.output(GPIO_OUT, GPIO.HIGH)
                	time.sleep(5.0)
			GPIO.output(GPIO_OUT, GPIO.LOW)#light off
			
		else:
			print "light off"
			print (BT3)
			break
		
	else:
        	GPIO.output(GPIO_OUT, GPIO.LOW)
        	print("Light Power OF")
		#print(inValue)
	        time.sleep(1.0)
# Reset GPIO settings
GPIO.cleanup()