/*
	参考としてPythonでのVertexクラスの実装
	Class Vertex4(object):
		def __init__(self, x, y):
			self._x = x
			self._y = y

		def area(self):
			return self._x * self._y

		def scale(self, i):
			self._x = self._x * i
			self._y = self._y * i


	# Vertexクラスを継承したクラス
	Class Vertex3D(Vertex):
		def __init__(self, x, y, z):
			super().__init__(x, y)
			self._z = z

		def area_3d(self):
			return self._x * self._y * self._z

		def scale_3d(self, i):
			self._x = self._x * i
			self._y = self._y * i
			self._z = self._z * i

	v = Vertex3D(3, 4, 5)
	v.scale(10)
	print(v.area_3d())
*/

// Goには継承がないが、それを担うEmbeddedがある
package main

import "fmt"

type Vertex4 struct {
	x, y int
}

func (v Vertex4) Area() int {
	return v.x * v.y
}

func (v *Vertex4) Scale(i int) {
	v.x = v.x * i
	v.y = v.y * i
}

/*
func New(x, y int) *Vertex4 {
	return &Vertex4{x, y}
}
*/

type Vertex3D struct {
	// 継承したいstruct名を書くだけでsuper().～～と同じになる ★Embedded
	Vertex4
	z int
}

func (v Vertex3D) Area3D() int {
	return v.x * v.y * v.z
}

func (v *Vertex3D) Scale3D(i int) {
	v.x = v.x * i
	v.y = v.y * i
	v.z = v.z * i
}

func New(x, y, z int) *Vertex3D {
	return &Vertex3D{Vertex4{x, y}, z}
}

func main() {
	v := New(3, 4, 5)
	v.Scale(10)
	fmt.Println(v.Area())
	fmt.Println(v.Area3D())
}
