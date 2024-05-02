/*
	参考としてPythonでのVertexクラスの実装
	Class Vertex3(object):
		def __init__(self, x, y):
			self._x = x
			self._y = y

		def area(self):
			return self._x * self._y

		def scale(self, i):
			self._x = self._x * i
			self._y = self._y * i

	v = Vertex3(3, 4)
	v.scale(10)
	print(v.area())
*/

package main

import "fmt"

type Vertex3 struct {
	// x, yを小文字にしたことで外部パッケージからは参照できない
	x, y int
}

func (v Vertex3) Area() int {
	return v.x * v.y
}

func (v *Vertex3) Scale(i int) {
	v.x = v.x * i
	v.y = v.y * i
}

// 今回は同パッケージのstructなので、呼び出せている。
//　外部パッケージの呼び出しには 外部パッケージ名.New() *返すストラクト名{}の形がよく使われる
func New(x, y int) *Vertex3 {
	return &Vertex3{x, y}
}

func main() {
	// v := Vertex3{3, 4}
	// fmt.Println(Area(v))
	v := New(3, 4)
	v.Scale(10)
	fmt.Println(v.Area())

}
