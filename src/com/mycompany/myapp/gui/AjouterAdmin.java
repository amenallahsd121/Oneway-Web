
package com.mycompany.myapp.gui;

import com.codename1.ui.Button;
import com.codename1.ui.Dialog;
import com.codename1.ui.TextField;
import com.codename1.ui.layouts.BoxLayout;
import com.codename1.ui.plaf.Style;
import com.codename1.ui.util.Resources;
import com.mycompany.myapp.entities.Livreur;
import com.mycompany.myapp.entities.Utilisateur;
import com.mycompany.myapp.service.ServiceLivreur;
import com.mycompany.myapp.service.ServiceUser;

public class AjouterAdmin extends BaseForm{
     public AjouterAdmin(Resources res) {
        setTitle("Ajouter un admin");
        setLayout(new BoxLayout(BoxLayout.Y_AXIS));
        
        TextField nomfield = new TextField("", "Nom", 20, TextField.ANY);
        TextField prenomfield = new TextField("", "Prenom", 20, TextField.ANY);
        TextField emailfield = new TextField("", "E-Mail", 20, TextField.EMAILADDR);
        TextField mdpfield = new TextField("", "Password", 20, TextField.PASSWORD);
        TextField adressefield = new TextField("", "adresse", 20, TextField.ANY);

        Style textFieldStyle = new Style();
        textFieldStyle.setFgColor(0x000000); // black color
        nomfield.setUnselectedStyle(textFieldStyle);
        prenomfield.setUnselectedStyle(textFieldStyle);
        emailfield.setUnselectedStyle(textFieldStyle);
        mdpfield.setUnselectedStyle(textFieldStyle);        
        adressefield.setUnselectedStyle(textFieldStyle);


    
        
        Button ajouterButton = new Button("Ajouter");
        ajouterButton.addActionListener(e -> {
 
            
            String nom = nomfield.getText();
            String prenom = prenomfield.getText();
            String email = emailfield.getText();
            String mdp = mdpfield.getText();            
            String adresse = adressefield.getText();


            // Create a new Livreur object
            Utilisateur user = new Utilisateur(nom, prenom, adresse,  email, mdp, "Admin");

            // Add the Livreur using the LivreurService
            ServiceUser.getInstance().ajouterAdmin(user);

            // Show a confirmation dialog
            Dialog.show("Succès", "Le livreur a été ajouté avec succès", "OK", null);

            // Go back to the LivreurList form
            new UserList(res).showBack();
        });

        // Add the text fields and button to the form
        addComponent(nomfield);
        addComponent(prenomfield);
        addComponent(emailfield);
        addComponent(mdpfield);        
        addComponent(adressefield);

        addComponent(ajouterButton);

        // Add a back button to the top of the form
        Button retourButton = new Button("Retour");
        retourButton.addActionListener(e -> new UserList(res).showBack());
        addComponent(retourButton);
    }
    
}
