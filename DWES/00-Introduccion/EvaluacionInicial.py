# 1. Determinar si un numero es igual a 6
print("Ejercicio 1")
num1 = int(input("Dame un numero:"))
if num1 == 6:
    print(num1,"es igual a 6")
else:
    print(num1,"no es igual a 6")

# 2. Calcule el doble de un número
print("Ejercicio 2")
num2 = int(input("Dame otro numero:"))
print("El doble de", num2,"es",num2*2)

# 3. Muestre los números del 5 al 1
print("Ejercicio 3")
num3 = 5
while num3 > 0:
    print(num3)
    num3 -=1

# 4. determine si un número es positivo
print("Ejercicio 4")
num4 = int(input("Dame un numero:"))
if num4 < 0:
    print("Es un numero negativo")
else:
    print("Es un numero positivo")

# 5. Calcule el area de un cuadrado y el volumen de un cubo dado su lado
print("Ejercicio 5")
lado_cuadrado = float(input("Dame el lado del cuadrado:"))
print("El area de un cuadrado:",lado_cuadrado*lado_cuadrado)
lado_cubo = float(input("Dame el lado del cubo:"))
print("El volumen de un cubo:",lado_cubo*lado_cubo*lado_cubo)

# 6. Muestre los números pares del 1 al diez
print("Ejercicio 6")
i = 1
while i <= 10:
    if i%2 == 0:
        print(i)
    i = i + 1

# 7. Determina si un numero es múltiplo de tres o no;
print("Ejercicio 7")
num5 = int(input("Dame un numero"))
if num5%3 == 0:
    print(num5, "es un multiplo de 3")
else:
    print(num5, "no es multiplo de 3")
# 8. Calcule el área de un triangulo rectangulo dado sus catetos
print("Ejercicio 8")
base = float(input("La base del triangulo rectangulo:"))
altura = float(input("La altura del triangulo rectangulo:"))
print("El area del triangulo rectangulo es:",(base*altura)/2)
# 9. Determine si un numero es positivo, negativo o 0
print("Ejercicio 9")
num6 = int(input("Dame un numero:"))
if num6 < 0:
    print("Es un numero negativo")
elif num6 == 0:
    print("Es 0")
else:
    print("Es un numero positivo")

# 10. Calcule el promedio de dos numero
print("Ejercicio 10")
num7 = int(input("Dame un numero:"))
num8 = int(input("Dame otro numero:"))
print("El promedio entre los numeros",num7,"y",num8,"es",(num7+num8)/2)

# 11. Calcule la suma de los numeros pares del 1 al N, donde N es un número ingresado por el usuario
print("Ejercicio 11")
num9 = int(input("Dame un numero:"))
total = 0
while num9 > 1:
    if num9%2 == 0:
        total+= num9
    num9 = num9 - 1 
print("Total:",total)

# 12. Determine si un número es un número perfecto. Un numero perfecto es aquel cuya suma de divisores propios (distintos del propio) es igual al numero
print("Ejercicio 12")
num10 = int(input("Dame un numero:"))
divisor = num10 - 1
aux = 0
while divisor >= 1:
    if num10%divisor == 0:
        aux += divisor
    divisor -= 1

if aux == num10:
    print(num10, "Es un numero perfecto")
else:
    print(num10, "no es un numero perfecto")

# 13. Calcule el factorial de un numero
print("Ejercicio 13:")
num11 = int(input("Dame un numero:"))
total = 1
while num11 > 0:
    total = total * num11
    num11 -= 1
print("El factorial de",num11,"es:",total)

#  14. Dado la base y el exponente, calcule la potencia
print("Ejercicio 14")
base = int(input("Dame un numero:"))
expo = int(input("Dame el exponente:"))
total = 1
while expo > 0:
    total = total * base
    expo -= 1

print("Resultado:",total)
# 15. Calcule la media de varios numeros positivos introducidos por teclado mientras sean distintos de 0
print("Ejercicio 15")
i = 0
pos = 1
total = 0
while pos > 0:
    pos = int(input("Dame un numero positivo:"))
    if pos > 0:
        total += pos
        i+= 1
print("La media es:",total/i)