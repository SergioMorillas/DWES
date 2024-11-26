import binascii
import pyperclip as clipboard
filename = 'Horario.jpg'
with open(filename, 'rb') as f:
    content = f.read()
clipboard.copy(binascii.hexlify(content))