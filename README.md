What I used today and updated to my code<br>
https://stackoverflow.com/questions/48081731/conditional-checkout-fee-based-off-of-checkbox-value-woocommerce?rq=4<br>
https://wordpress.org/support/topic/checkout-hooks-not-more-working/<br>
https://stackoverflow.com/questions/42977490/add-field-to-wordpress-billing-fields<br>
I used only the function WC()->cart->get_cart_contents_weight() from the video below<br>
https://www.youtube.com/watch?v=CS2ONi_d1e4<br>

Mini proiect digital ninja<br>

Pluginul poate fi activat doar daca e activ si pluginul WooCommerce<br>
Plugin-ul va adauga functionalitati noi in pagina de checkout a Woocomerce<br>
Prin activarea pluginului, acesta va insera in zona campurilor de billing un checkbox insotit de label-ul "Vreau oferta livrare"<br>
In momentul bifarii, checkbox-ul va trebui sa declanseze afisarea unei metode de livrare denumita "Oferta livrare".<br>
Plugin-ul trebuie sa inregistreze o metoda de shipping denumita "Oferta livrare", care va fi vizibila in checkout doar daca checkbox-ul este bifat. In caz contrar, acea metoda nu este vizibila in checkout.<br>
Metoda de Shipping trebuie sa coste 10 lei pt. fiecare Kg din cos iar pretul minim de livrare este 50 de lei.<br>
50 de lei (pretul minim de livrare) este o setare implicită din metoda de shipping, care trebuie sa poata fi editata din setarile metodei de shipping.<br>
In zona de admin a fiecărei comenzi, checkboxul bifat trebuie sa fie vizibil in zona de billing (sus in comanda)<br>
La bifare checkbox si refresh, pagina de checkout trebuie sa se memoreze faptul ca checkboxul a fost bifat.<br>
