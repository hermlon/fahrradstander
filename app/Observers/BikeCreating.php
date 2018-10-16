<?php

namespace App\Observers;

use App\Bike;

class BikeCreating
{
  /**
   * Handle the bike "creating" event.
   *
   * @param  \App\Bike  $bike
   * @return void
   */
    public function creating(Bike $bike)
    {
      $config = array(
        "digest_alg" => "sha512",
        "private_key_bits" => 2048,
        "private_key_type" => OPENSSL_KEYTYPE_RSA,
      );

      // Create the private and public key
      $res = openssl_pkey_new($config);

      // Extract the private key from $res to $privKey
      openssl_pkey_export($res, $privKey);

      // Extract the public key from $res to $pubKey
      $pubKey = openssl_pkey_get_details($res);
      $pubKey = $pubKey["key"];

      $bike->public_key = $pubKey;
      $bike->private_key = $privKey;
    }
}
