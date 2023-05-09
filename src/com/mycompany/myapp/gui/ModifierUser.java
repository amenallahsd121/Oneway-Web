/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
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

/**
 *
 * @author wwwou
 */
public class ModifierUser extends BaseFormBack{
     public ModifierUser(Resources res, Utilisateur user) {
        setTitle("Modifier utilisateur");
        setLayout(new BoxLayout(BoxLayout.Y_AXIS));

        // Create text fields for each attribute of Livreur that can be modified
         TextField nomfield = new TextField(user.getNom(), "Nom", 20, TextField.ANY);
        TextField prenomfield = new TextField(user.getPrenom(), "Prenom", 20, TextField.ANY);
        TextField emailfield = new TextField(user.getEmail(), "E-Mail", 20, TextField.EMAILADDR);
        TextField mdpfield = new TextField(user.getPassword(), "Password", 20, TextField.ANY);
        TextField adressefield = new TextField(user.getAdresse(), "adresse", 20, TextField.ANY);
        
        Style textFieldStyle = new Style();
        textFieldStyle.setFgColor(0x000000); // black color
        nomfield.setUnselectedStyle(textFieldStyle);
        prenomfield.setUnselectedStyle(textFieldStyle);
        emailfield.setUnselectedStyle(textFieldStyle);
        mdpfield.setUnselectedStyle(textFieldStyle);        
        adressefield.setUnselectedStyle(textFieldStyle);

        

        // Create a button to save the modifications
        Button modifierButton = new Button("Modifier");
        modifierButton.addActionListener(e -> {
            // Get the new values from the text fields
            String nom = nomfield.getText();
            String prenom = prenomfield.getText();
            String email = emailfield.getText();
            String mdp = mdpfield.getText();            
            String adresse = adressefield.getText();

            System.out.println("password  : " + mdp);
            // Create a new Livreur object with the new values
            Utilisateur newUser = new Utilisateur(user.getId() , nom, prenom,  adresse, email,user.getType(),mdp);
            System.out.println(newUser.getPassword());

            // Call the modifierLivreur method of ServiceLivreur to modify the Livreur
            if (ServiceUser.getInstance().modifierUser(newUser)) {
                // Show a confirmation dialog if the modification was successful
                Dialog.show("Succès", "Le livreur a été modifié avec succès", "OK", null);
            } else {
                Dialog.show("Erreur", "Une erreur s'est produite lors de la modification", "OK", null);
            }

            // Go back to the LivreurList form
            new UserList(res).showBack();
        });

        // Add the text fields and button to the form
        addComponent(nomfield);
        addComponent(prenomfield);
        addComponent(emailfield);
        addComponent(mdpfield);        
        addComponent(adressefield);

        addComponent(modifierButton);

        // Add a back button to the top of the form
        Button retourButton = new Button("Retour");
        retourButton.addActionListener(e -> new UserList(res).showBack());
        addComponent(retourButton);
    }
}
