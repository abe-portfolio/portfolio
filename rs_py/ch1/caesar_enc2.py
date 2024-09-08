# lambda式を用いてエレガントに

def encrypt(text, shift):
    a = ord("A")
    conv = lambda n: chr((ord(n) - a + shift) % 26 + a)
    enc1 = lambda n: conv(n) if "A" <= n <= "Z" else n
    return "".join([enc1(n) for n in text])

enc = encrypt("I LOVE YOU.", 3)
dec = encrypt(enc, -3)
print(enc, "=>", dec)