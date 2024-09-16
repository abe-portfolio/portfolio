use std::collections::{HashSet, HashMap};
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

pub const GUESS_LENGTH: usize = 5;
pub const GUESS_MAX: usize = 6;

pub struct Game {
    guesses: Vec<WordGuess>,
    answer: String,
    dictionary: Dictionary,
}

impl Default for Game {
    fn default() -> Self {
        let dict = Dictionary::new();
        Game {
            guesses: Vec::with_capacity(GUESS_MAX),
            answer: dict.get_random_word(),
            dictionary: dict,
        }
    }
}

impl Game {
    // pub fn get_answer(&self) -> String {
    //     self.answer.to_string()
    // }
    
    /*
    pub fn in_dictionary(&self, word: &str) -> bool {
        self.dictionary.words.get(word).is_some()
    }
    */

    fn build_letter_counts(&self, word: &str) -> HashMap<char, usize> {
        let mut counts = HashMap::new();
        for c in word.chars() {
            match counts.get_mut(&c) {
                Some(v) => *v += 1,
                None => { counts.insert(c, 1); },
            };
        }
        counts
    }
}

#[derive(Copy, Clone, Debug, PartialEq, Eq, Ord)]
pub enum HitAccuracy {
    InRightPlace,
    InWord,
    NotInWord,
}

#[derive(Copy, Clone, Debug, PartialEq, Eq)]
pub struct GuessLetter {
    pub letter: char,
    pub accuracy: HitAccuracy,
}

#[derive(Debug, PartialEq, Eq)]
pub struct WordGuess {
    pub letters: Vec<GuessLetter>,
}

impl WordGuess {
    pub fn word(&self) -> String {
        self.letters.as_slice().iter().map(|gl| gl.letter).collect();
    }

    pub fn letters(&self) -> &[GuessLetter] {
        self.letters.as_slice();
    }
}
