import serial
import mysql.connector


 
# Creating connection object
mydb = mysql.connector.connect(
    host = "localhost",
    user = "gvanca",
    password = "12345678",
    database="iot"
)

mycursor = mydb.cursor()

if __name__ == '__main__':
    ser = serial.Serial('/dev/ttyUSB0', 9600, timeout=1)
    ser.reset_input_buffer()
    while True:
        if ser.in_waiting > 0:
            line = ser.readline().decode('utf-8').rstrip()
            x = line.split()
            t = x[1]
            p = x[3]
            a = x[5]
            sql = "INSERT INTO iot_(temperature, pressure, altitude) VALUES(%s, %s, %s)"
            val = (t, p, a)
            mycursor.execute(sql, val)
            mydb.commit()
            print(t,p,a)
            