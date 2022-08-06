<?php 

function hashPassword($plainPassword)
{
    return password_hash($plainPassword, PASSWORD_DEFAULT);

}

function verifyPassword($password,$hashedPassword)
{
    return password_verify($password,$hashedPassword);
}