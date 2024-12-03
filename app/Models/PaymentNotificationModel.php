<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentNotificationModel
{
    public string $hash;
    public TransactionData $transaction;
    public CustomerData $customer;
    public OrderData $order;
    public string $message;
    public string $code;
}

class TransactionData
{
    public string $merchantCode;
    public string $paymentReference;
    public string $merchantReference;
    public string $sessionId;
    public \DateTime $date;
}

class CustomerData
{
    public ?CustomerAccountData $account;
    public ?CustomerCardData $card;
    public ?CustomerUssdData $ussd;
}

class OrderData
{
    public float $amount;
    public string $currency;
    public string $description;
}

class CustomerAccountData
{
    public string $name;
    public string $virtualAccountNumber;
    public string $bank;
    public string $senderBankCode;
    public string $senderBankName;
    public string $senderAccountNumber;
    public string $senderName;
}

class CustomerCardData
{
    public string $name;
    public string $processor;
    public string $senderCardNumber;
    public string $senderName;
}

class CustomerUssdData
{
    public string $name;
    public string $ussdCode;
    public string $senderBankCode;
    public string $senderBankName;
    public string $senderPhoneNumber;
}
