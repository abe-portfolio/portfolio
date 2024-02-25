from turtle import *
import colorsys as cs

bgcolor('black')
tracer(100)
pensize(1)
for i in range(250):
    c = cs.hsv_to_rgb(i/150, i/150, 1)
    fillcolor(c)
    begin_fill()
    fd(i)
    lt(100)
    circle(30)
    for j in range(2):
        fd(i*j)
        rt(109)
    end_fill()

# done()