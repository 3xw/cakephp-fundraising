<!-- Email Body : BEGIN -->
<table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" align="center" width="600" style="margin: auto;" class="email-container">
   <!-- Hero Image, Flush : BEGIN -->
   <tr>
   <td bgcolor="#ffffff">
     <!-- Image -->
   </td>
   </tr>
   <!-- 1 Column Text + Button : BEGIN -->
   <tr>
     <td bgcolor="#ffffff" style="padding: 40px 40px 20px; text-align: center;">
          <h1 style="margin: 0; font-family: sans-serif; font-size: 24px; line-height: 27px; color: #333333; font-weight: normal;">Merci <?= $donation->first_name." ".$donation->last_name?></h1>
     </td>
   </tr>
   <tr>
     <td bgcolor="#ffffff" style="padding: 0 40px 40px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;">
          <p style="margin: 0;"><?= $this->Text->autoParagraph(h($donation->contribution->thanks))?></p>
     </td>
   </tr>

   <tr>
      <td bgcolor="#ffffff" style="padding: 0 40px 40px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;">
         <p style="margin: 0;">
            <br>
            Votre don: <b><?= $donation->contribution->name?></b>
            <br>
            Montant: <b>CHF <?= $donation->amount?></b>
            <br>
            De la part de: <?= $donation->first_name." ".$donation->last_name?>
            <br>
         </p>
      </td>
   </tr>
   <!-- 1 Column Text : END -->

</table>
<!-- Email Body : END -->
