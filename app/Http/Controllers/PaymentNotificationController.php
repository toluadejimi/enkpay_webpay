<?php

namespace App\Http\Controllers;

use App\Helpers\EncryptionHelper;
use App\Models\CustomerAccountData;
use App\Models\CustomerCardData;
use App\Models\CustomerData;
use App\Models\CustomerUssdData;
use App\Models\OrderData;
use App\Models\PaymentNotificationModel;
use App\Models\TransactionData;
use Exception;
use Illuminate\Support\Facades\Log;

class PaymentNotificationController extends Controller
{
    public function decryptPaymentNotification($encryptedData, $integrationKey, $merchantCode)
    {
        try {
            $decryptedData = EncryptionHelper::decryptString($encryptedData, $integrationKey, $merchantCode);

            $notificationData = json_decode($decryptedData, true);

            if (!$notificationData) {
                throw new Exception('Invalid JSON data.');
            }

            return $this->mapToModel($notificationData);
        } catch (Exception $ex) {
            Log::error("Error in decryptPaymentNotification: {$ex->getMessage()}");
            throw $ex;
        }
    }

    private function mapToModel(array $data): PaymentNotificationModel
    {
        $model = new PaymentNotificationModel();

        $model->hash = $data['hash'];
        $model->transaction = $this->mapToTransaction($data['transaction']);
        $model->customer = $this->mapToCustomer($data['customer']);
        $model->order = $this->mapToOrder($data['order']);
        $model->message = $data['message'];
        $model->code = $data['code'];

        return $model;
    }

    private function mapToTransaction(array $data): TransactionData
    {
        $transaction = new TransactionData();
        $transaction->merchantCode = $data['merchantCode'];
        $transaction->paymentReference = $data['paymentReference'];
        $transaction->merchantReference = $data['merchantReference'];
        $transaction->sessionId = $data['sessionId'];
        $transaction->date = new \DateTime($data['date']);

        return $transaction;
    }

    private function mapToCustomer(array $data): CustomerData
    {
        $customer = new CustomerData();
        $customer->account = $this->mapToAccount($data['account'] ?? null);
        $customer->card = $this->mapToCard($data['card'] ?? null);
        $customer->ussd = $this->mapToUssd($data['ussd'] ?? null);

        return $customer;
    }

    private function mapToOrder(array $data): OrderData
    {
        $order = new OrderData();
        $order->amount = $data['amount'];
        $order->currency = $data['currency'];
        $order->description = $data['description'];

        return $order;
    }

    private function mapToAccount(?array $data): ?CustomerAccountData
    {
        if (!$data) return null;

        $account = new CustomerAccountData();
        $account->name = $data['name'];
        $account->virtualAccountNumber = $data['virtualAccountNumber'];
        $account->bank = $data['bank'];
        $account->senderBankCode = $data['senderBankCode'];
        $account->senderBankName = $data['senderBankName'];
        $account->senderAccountNumber = $data['senderAccountNumber'];
        $account->senderName = $data['senderName'];

        return $account;
    }

    private function mapToCard(?array $data): ?CustomerCardData
    {
        if (!$data) return null;

        $card = new CustomerCardData();
        $card->name = $data['name'];
        $card->processor = $data['processor'];
        $card->senderCardNumber = $data['senderCardNumber'];
        $card->senderName = $data['senderName'];

        return $card;
    }

    private function mapToUssd(?array $data): ?CustomerUssdData
    {
        if (!$data) return null;

        $ussd = new CustomerUssdData();
        $ussd->name = $data['name'];
        $ussd->ussdCode = $data['ussdCode'];
        $ussd->senderBankCode = $data['senderBankCode'];
        $ussd->senderBankName = $data['senderBankName'];
        $ussd->senderPhoneNumber = $data['senderPhoneNumber'];

        return $ussd;
    }
}
