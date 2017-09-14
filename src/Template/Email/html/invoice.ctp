<!-- Email Body : BEGIN -->
<table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" align="center" width="600" style="margin: auto;" class="email-container">

   <!-- Hero Image, Flush : END -->

   <!-- 1 Column Text + Button : BEGIN -->
   <tr>
      <td bgcolor="#ffffff" style="padding: 40px 40px 20px; text-align: center;">
         <h1 style="margin: 0; font-family: sans-serif; font-size: 24px; line-height: 27px; color: #333333; font-weight: normal;">Paiement par virement bancaire</h1>
      </td>
   </tr>
   <tr>
      <td bgcolor="#ffffff" style="padding: 0 40px 40px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;">
         <p style="margin: 0;">
            Pour: <b>xxx</b>
            <br>
            Av. de la gare 1 - 1003 Lausanne
            <br>
            Banque Raiffeisen de Lavaux
            <br>
            IBAN: <b>CH11 xxxx xxx xxx xxxx</b>
            <br>
            Ref: <b><?= $donation->id." - ".$donation->email?></b>
            <br>
            Montant: <b>CHF <?= $donation->amount?></b>
         </p>
      </td>
   </tr>
   <!-- 1 Column Text : END -->

</table>
<!-- Email Body : END -->
