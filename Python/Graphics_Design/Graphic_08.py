from turtle import *
import colorsys as cs

bgcolor('black')
tracer(5)
width(2)
h = 0
for i in range(50):
    col = cs.hsv_to_rgb(h, 0.5, 1)
    color(col)
    for j in range(10):
        circle(i*2)
        right(36)
    h += 0.3

done()
