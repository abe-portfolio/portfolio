#[derive(Debug)]

struct Rectangle {
    width: u32,
    height: u32,
}

impl Rectangle {
    fn square(width: u32) -> Self {
        Self {
            width,
            height: width,
        }
    }
    
    fn area(&self) -> u32 {
        self.width * self.height
    }
    
    fn reset_width(&mut self, width: u32) {
        self.width = width;
    }
}

fn main() {
    let mut rect: Rectangle = Rectangle {
        width: 30,
        height: 40,
    };
    
    println!("{}", rect.area());
    println!("rect: {:?}", rect);
    
    let square: Rectangle = Rectangle::square(50);
    println!("square: {:?}", square);

    rect.reset_width(100);
    println!("reset_width: {:?}", rect);
}