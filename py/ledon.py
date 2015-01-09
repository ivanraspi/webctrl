import RPi.GPIO as GPIO
import time,sys
 
def blink(times, delay):
    GPIO.setmode(GPIO.BOARD)
    GPIO.setup(12, GPIO.OUT)
 
    # while times>0:
    #    if 0==times%2:
    GPIO.output(12, GPIO.HIGH) #or output(11, GPIO.True)
     #   else:
      #      GPIO.output(12, GPIO.LOW)
       # time.sleep(delay)
        #times-=1
    # return

    f = open('./data/k.txt','w')
    f.write("1")
    #print >>f, "0"
    f.close()


    exit() 
 
if __name__ == '__main__':
    blink(20, 1)
