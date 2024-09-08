use std::collections::HashSet;
use rand::seq::SliceRandom;

const WORDS: &str = include_str!("words.txt");

pub struct Dictionary {
    words: HashSet<&'static str>,
}

impl Dictionary {
    pub fn new() -> Self {
        let words: HashSet<&str> = WORDS.split("\r\n").collect();
        Self { words }
    }
    pub fn get_random_word(&self) -> String {
        Vec::from_iter(self.words.iter())
            .choose(&mut rand::thread_rng())
            .unwrap()
            .to_string()
    }
}


pub struct Game {
    answer: String,
    dictionary: Dictionary,
}

impl Default for Game {
    fn default() -> Self {
        let dict = Dictionary::new();
        Game {
            answer: dict.get_random_word(),
            dictionary: dict,
        }
    }
}

impl Game {
    pub fn in_dictionary(&self, word: &str) -> bool {
        self.dictionary.words.get(word).is_some()
    }
}