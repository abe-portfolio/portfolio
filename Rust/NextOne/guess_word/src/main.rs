// use guess_word::Dictionary;
// グロブの利用でも上と同様に可能
use guess_word::*; 
use std::io;

fn main() {
    /*
    use を使用しないと以下のようになる
    println!("{}", guess_word::Dictionary::new().get_random_word());

    use を使用すると以下のようになる
    println!("{}", Dictionary::new().get_random_word());
    */

    let game = Game::default();
    let mut guess = String::new();
    let answer = game.get_answer();

    println!("{}", answer);

    loop {
        // io::stdin().read_line(&mut guess).expect("Failed to read line");
        io::stdin()
            .read_line(&mut guess)
            .expect("Failed to read line");

        let trimmed_guess = guess.trim();
        if game.in_dictionary(&trimmed_guess) {
            if answer == trimmed_guess {
                println!("Matched word!");
                break;
            } else {
                println!("Not match word...");
            }
        } else {
            println!("Well...What's?");
        }

        guess.clear();
    }
}
