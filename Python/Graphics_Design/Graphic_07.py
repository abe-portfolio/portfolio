from turtle import *
import colorsys as cs

hideturtle()
speed(0)
pensize(3)
bgcolor("black")
hue = 0

for i in range(300):
    col = cs.hsv_to_rgb(hue, 1, 1)
    pencolor(col)
    hue += 0.005
    circle(5-i, 100)
    lt(80)
    circle(5-i, 100)
    rt(100)

done()

