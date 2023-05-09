
package com.mycompany.myapp.gui;

import com.codename1.ui.Button;
import com.codename1.ui.Container;
import com.codename1.ui.Dialog;
import com.codename1.ui.Label;
import com.codename1.ui.layouts.BoxLayout;
import com.codename1.ui.plaf.Border;
import com.codename1.ui.util.Resources;
import com.mycompany.myapp.entities.Utilisateur;
import com.mycompany.myapp.service.ServiceLivreur;
import com.mycompany.myapp.service.ServiceUser;
import java.util.ArrayList;

public class UserList extends BaseFormBack {
     public UserList(Resources res) {
    NewsfeedForm nf = new NewsfeedForm(res);
    AjouterAdmin al = new AjouterAdmin(res);
    ArrayList<Utilisateur> utilisateurs = null;
    
    ArrayList<Utilisateur> list = ServiceUser.getInstance().getAllUser();
    utilisateurs = list;
    
    setTitle("Liste des utilisateurs");
    setLayout(new BoxLayout(BoxLayout.Y_AXIS));
    
    // Create a container for the buttons with a BoxLayout set to X_AXIS
    Container buttonsContainer = new Container(new BoxLayout(BoxLayout.X_AXIS));
    buttonsContainer.getAllStyles().setPadding(10, 10, 10, 10);
    buttonsContainer.getAllStyles().setMargin(10, 10, 10, 10);
   
    // Create the buttons and add them to the container
    Button ajouterButton = new Button("Ajouter utilisateur");
    ajouterButton.addActionListener(e -> al.show()); 
        // Handle adding a new livreur here
    
    buttonsContainer.add(ajouterButton);
    
    Button retourButton = new Button("Retour");
    retourButton.addActionListener(e -> nf.show());
    buttonsContainer.add(retourButton);
    
    // Add the container with the buttons to the form
    addComponent(buttonsContainer);
    
    // Loop over each Livreur object in the list and display its properties
for (Utilisateur user : utilisateurs) {
    Container container = new Container(new BoxLayout(BoxLayout.Y_AXIS));
    container.getAllStyles().setPadding(10, 10, 10, 10);
    container.getAllStyles().setMargin(10, 10, 10, 10);
    container.getAllStyles().setBorder(Border.createLineBorder(2));

    Label nomLabel = new Label("Nom: " + user.getNom());
    Label prenomLabel = new Label("Prenom: " + user.getPrenom());  
    Label Adresse = new Label("Adresse: " + user.getAdresse());    
    Label Email = new Label("Email: " + user.getEmail());    
    Label type = new Label("type: " + user.getType());    
    //Label Birthday = new Label("Birthday: " + user.getbirthday());




    container.add(nomLabel);
    container.add(prenomLabel);
    container.add(Adresse);
    container.add(Email);    
    container.add(type);    
    //container.add(Birthday);


     ModifierUser ml = new ModifierUser(res, user);
    // Create the "Update" button and add an ActionListener to handle updating the livreur
    Button updateButton = new Button("Update");
    updateButton.addActionListener(e -> ml.show());
    
    // Create the "Delete" button and add an ActionListener to handle deleting the livreur
    Button deleteButton = new Button("Delete");
    deleteButton.addActionListener(e -> {
        boolean confirmed = Dialog.show("Confirmation", "Are you sure you want to delete this livreur?", "Yes", "No");
                if (confirmed) {
                    ServiceUser.getInstance().deleteUser(user.getId());
                    new UserList(res).show();
                }
    });
    
    // Create a container for the buttons with a BoxLayout set to X_AXIS
    Container buttonsContainers = new Container(new BoxLayout(BoxLayout.X_AXIS));
    buttonsContainers.add(updateButton);
    buttonsContainers.add(deleteButton);
    
    container.add(buttonsContainers);

    addComponent(container);
}

}
}
