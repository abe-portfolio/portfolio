from turtle import *
import colorsys as cs

bgcolor('white')
tracer(10)
c = 0
for i in range(900):
    p = cs.hsv_to_rgb(c, 1, 0.99)
    pencolor(p)
    c += 0.001
    circle(i, 40)
    left(90)
    left(350)
    right(90)
    left(90)
    left(90)
    left(70)
    left(35)
    right(90)
    hideturtle()

done()