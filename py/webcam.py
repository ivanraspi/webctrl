#!/usr/bin/python
# Author : CodeLive
# Date   : 09/03/2014


# Import required Python libraries
import time
import RPi.GPIO as GPIO
import os,sys

GPIO.setmode(GPIO.BOARD)


# Define GPIO to use on Pi
GPIO_IN  = 11
GPIO_OUT = 12


print "Light Control Server @ CodeLive"

GPIO.cleanup()
# Set pins as output and input
GPIO.setup(GPIO_IN, GPIO.IN)
GPIO.setup(GPIO_OUT, GPIO.OUT)

while True:
        inValue = GPIO.input(GPIO_IN)
	print(inValue)
        if inValue != 0:
                print("Light Power ON")
		
        	os.system('fswebcam -d /dev/video0 -r 640x480 ./pics/`date +%y%m%d_%H%M%S`.jpg')        
     	#GPIO.output(GPIO_OUT, GPIO.HIGH)
                time.sleep(5.0)
	#	GPIO.output(GPIO_OUT, GPIO.LOW)
	else:
        	GPIO.output(GPIO_OUT, GPIO.LOW)
        	print("Light Power OF")
		print(inValue)
	        time.sleep(1.0)
# Reset GPIO settings
GPIO.cleanup()
