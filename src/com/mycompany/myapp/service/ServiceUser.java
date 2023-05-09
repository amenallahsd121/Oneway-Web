
package com.mycompany.myapp.service;

import com.codename1.io.CharArrayReader;
import com.codename1.io.ConnectionRequest;
import com.codename1.io.JSONParser;
import com.codename1.io.NetworkEvent;
import com.codename1.io.NetworkManager;
import com.codename1.ui.Dialog;
import com.codename1.ui.TextField;
import com.codename1.ui.events.ActionListener;
import com.codename1.ui.util.Resources;
import com.mycompany.myapp.entities.Utilisateur;
import com.mycompany.myapp.gui.NewsfeedForm;
import com.mycompany.myapp.gui.NewsfeedFormBack;
import com.mycompany.myapp.gui.SessionManager;
import com.mycompany.myapp.gui.SignInForm;
import com.mycompany.myapp.utils.Statics;
import java.util.ArrayList;
import java.util.Date;
import java.util.List;
import java.util.Map;
import java.io.IOException;


public class ServiceUser {
    public ArrayList<Utilisateur> users;
    String json;

    public static ServiceUser instance = null;
    public boolean resultOK;
    private ConnectionRequest req;

    private ServiceUser() {
        req = new ConnectionRequest();
    }

    public static ServiceUser getInstance() {
        if (instance == null) {
            instance = new ServiceUser();
        }
        return instance;
    }

    public void ajouterUser(TextField nom, TextField prenom, TextField email, TextField mdp, TextField adresse, Resources res) {
       
       String url=Statics.BASE_URL+"/signup?nom="+nom.getText().toString()+"&prenom="+prenom.getText().toString()+
        "&email="+email.getText().toString()+"&mdp="+mdp.getText().toString()+"&adresse="+adresse.getText().toString();
        
        req.setUrl(url);
        
        if (nom.getText().equals(" ") && prenom.getText().equals(" ") && mdp.getText().equals(" ") && email.getText().equals(" ")){
            Dialog.show("erreur","veuillez remplir les champs","ok",null);
        }
        
        req.addResponseListener((e)->{
            byte[]data = (byte[]) e.getMetaData();
            String responseData = new String(data);
            
            System.out.println("data ===>"+responseData);
        });
        NetworkManager.getInstance().addToQueueAndWait(req);
            
    }
    public boolean ajouterAdmin(Utilisateur r) {

        String url = Statics.BASE_URL + "/addAdmin";

        req.setUrl(url);
        req.setPost(false);
        req.addArgument("nom", r.getNom());
        req.addArgument("prenom", r.getPrenom() + "");
        req.addArgument("adresse", r.getAdresse() + "");
        req.addArgument("email", r.getEmail() + "");        
        req.addArgument("mdp", r.getPassword() + "");



        req.addResponseListener(new ActionListener<NetworkEvent>() {
            @Override
            public void actionPerformed(NetworkEvent evt) {
                resultOK = req.getResponseCode() == 200; //Code HTTP 200 OK
                req.removeResponseListener(this);
            }
        });
        NetworkManager.getInstance().addToQueueAndWait(req);
        return resultOK;
    }
      
        
           
    

    /////////////////////////////////////////////////////////////////////////////////////////
    public ArrayList<Utilisateur> getAllUser() {
        ArrayList<Utilisateur> result = new ArrayList<>();

        String url = Statics.BASE_URL + "/displayuser";
        req.setUrl(url);

       req.addResponseListener(new ActionListener<NetworkEvent>() {
    @Override
    public void actionPerformed(NetworkEvent evt) {
        JSONParser jsonp = new JSONParser();
        try {
            Map<String, Object> mapUser = jsonp.parseJSON(new CharArrayReader(new String(req.getResponseData()).toCharArray()));
            List<Map<String, Object>> listOfMaps = (List<Map<String, Object>>) mapUser.get("root");
            for (Map<String, Object> obj : listOfMaps) {
                Utilisateur t = new Utilisateur();
                float id = Float.parseFloat(obj.get("id").toString());
                t.setId((int) id);
                t.setNom(obj.get("name").toString());
                t.setPrenom(obj.get("lastname").toString());
                t.setAdresse(obj.get("adresse").toString());        
                t.setEmail(obj.get("email").toString());                
                t.setPassword(obj.get("password").toString());
                t.setType(obj.get("type").toString());
               
                //Date birthday = (Date) obj.get("birthday");
                //t.setbirthday(birthday);
                System.out.println("ID: " + id);

                result.add(t);
            }
        } catch (Exception ex) {
            ex.printStackTrace();
        }
    }
});


        NetworkManager.getInstance().addToQueueAndWait(req);

        return result;

    }

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
    public boolean deleteUser(int id) {
        String url = Statics.BASE_URL + "/userdelete/" + id;

        req.setUrl(url);

        req.addResponseListener(new ActionListener<NetworkEvent>() {
            @Override
            public void actionPerformed(NetworkEvent evt) {

                req.removeResponseCodeListener(this);
            }
        });

        NetworkManager.getInstance().addToQueueAndWait(req);
        return resultOK;
    }

    //Update 
    public boolean modifierUser(Utilisateur l) {
         String url = Statics.BASE_URL + "/userModify/" + l.getId();

        req.setUrl(url);
        req.setPost(false);
        req.addArgument("nom", l.getNom());
        req.addArgument("prenom", l.getPrenom() + "");
        req.addArgument("adresse", l.getAdresse() + "");
        req.addArgument("email", l.getEmail() + "");        
        req.addArgument("password", l.getPassword() + "");



        req.addResponseListener(new ActionListener<NetworkEvent>() {
            @Override
            public void actionPerformed(NetworkEvent evt) {
                resultOK = req.getResponseCode() == 200; //Code HTTP 200 OK
                req.removeResponseListener(this);
            }
        });
        NetworkManager.getInstance().addToQueueAndWait(req);
        return resultOK;

    }
    
    
     public String getByEmailUser(String email,String mdp){
            
            String url = Statics.BASE_URL+"/getUserByEmail/"+email;
         
        req = new ConnectionRequest(url, false); //false ya3ni url mazlt matba3thtich lel server
        req.setUrl(url);
        
        req.addResponseListener((e) ->{
            
            JSONParser j = new JSONParser();
            
              json = new String(req.getResponseData()) + "";
            
            
            try {
            
          
                System.out.println("data =="+json);
                
                Map<String,Object> password = j.parseJSON(new CharArrayReader(json.toCharArray()));

            }catch(Exception ex) {
                ex.printStackTrace();
            }   
            
        });
    
         //ba3d execution ta3 requete ely heya url nestanaw response ta3 server.
        NetworkManager.getInstance().addToQueueAndWait(req);
          return json;
    }
      public void signin(TextField email,TextField pwd,Resources res){
          ArrayList<Utilisateur> result = new ArrayList<>();
    String url = Statics.BASE_URL + "/getUserByEmail/" + email.getText().toString() + "/" + pwd.getText().toString();
    req = new ConnectionRequest(url, false);
    req.setUrl(url);

    req.addResponseListener((e) -> {

        JSONParser j = new JSONParser();

        String json = new String(req.getResponseData()) + "";

        if (json.equals("Wrong")) {
            Dialog.show("Echec d'authentification", "Username ou mot de passe eronné", "OK", null);
        } else {
            System.out.println("data == " + json);
            try {
                Map<String, Object> jsonResponse = j.parseJSON(new CharArrayReader(json.toCharArray()));
                Map<String, Object> user = (Map<String, Object>) jsonResponse.get("user");
                Utilisateur t = new Utilisateur();
                float id = Float.parseFloat(user.get("id").toString());
                t.setId((int) id);
                t.setNom(user.get("nom").toString());
                t.setPrenom(user.get("prenom").toString());
                t.setEmail(user.get("email").toString());
                t.setType(user.get("type").toString());

                // Add more properties as needed

                result.add(t);
            } catch (Exception ex) {
                ex.printStackTrace();
            }

            if (!result.isEmpty()) {
                Utilisateur user = result.get(0);
                System.out.println("type: " + user.getType());

                if (user.getType().equals("Admin")) {
                    
                    SessionManager.setId(user.getId());
                    SessionManager.setPrenom(user.getPrenom());
                    SessionManager.setMdp(pwd.getText().toString());
                    SessionManager.setNom(user.getNom());
                    SessionManager.setEmail(user.getEmail());
                    SessionManager.setType("Admin");
                    new NewsfeedFormBack(res).show();
                } else {
                    System.out.println("lee");
                }

                if (user.getType().equals("Client")) {
                   
                    SessionManager.setId(user.getId());
                    SessionManager.setPrenom(user.getPrenom());
                    SessionManager.setMdp(pwd.getText().toString());
                    SessionManager.setNom(user.getNom());
                    SessionManager.setEmail(user.getEmail());
                    SessionManager.setType("Client");
                     new NewsfeedForm(res).show();
                } else {
                    System.out.println("lee");
                }
            }
        }
    });

    NetworkManager.getInstance().addToQueueAndWait(req);
        }

}
