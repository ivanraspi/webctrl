import RPi.GPIO as GPIO
import time
 
def blink(times, delay):
    GPIO.setmode(GPIO.BOARD)
    GPIO.setup(12, GPIO.OUT)
 
   # while times>0:
    #    if 0==times%2:
    #        GPIO.output(12, GPIO.HIGH) #or output(11, GPIO.True)
     #   else:
    GPIO.output(12, GPIO.LOW)
       # time.sleep(delay)
        #times-=1

    f = open('./data/k.txt','w')
    f.write("0")
    #print >>f, "1"
    f.close()



   # return
    exit() 
 
if __name__ == '__main__':
    blink(20, 1)
