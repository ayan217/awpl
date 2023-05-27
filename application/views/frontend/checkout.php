<form action='<?= base_url('Home/checkout') ?>' method='post'>
    <input type="hidden" name="checkout_p" value="1">
    <input type="hidden" name="dpot_id" value="<?= $dpot_id ?>">
    <input type="hidden" name="total" value="<?= $amount ?>">
    Pay
    : <?= CURRENCY . ' ' . $amount ?>



    <button type='submit'>PAY</button>
</form>