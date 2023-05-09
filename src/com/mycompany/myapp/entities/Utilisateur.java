
package com.mycompany.myapp.entities;

import java.util.Date;


public class Utilisateur {
     int id;
    Date birthday;
    String nom, prenom, adresse, email,type,password;

    public Utilisateur() {
    }

    public Utilisateur(int id , String nom, String prenom, String adresse, String email,String type ,Date birthday) {
        this.id = id;
        this.nom = nom;
        this.prenom = prenom;
        this.adresse = adresse;        
        this.email = email;        
        this.type = type;
        this.birthday = birthday;
    }
    public Utilisateur(int id , String nom, String prenom, String adresse, String email,String type ,String password) {
        this.id = id;
        this.nom = nom;
        this.prenom = prenom;
        this.adresse = adresse;        
        this.email = email;        
        this.type = type;
        this.password = password;
    }
     public Utilisateur( String nom, String prenom, String adresse, String email,String type ,Date birthday) {
        this.nom = nom;
        this.prenom = prenom;
        this.adresse = adresse;        
        this.email = email;        
        this.type = type;
        this.birthday = birthday;
    }

    public String getPassword() {
        return password;
    }

    public void setPassword(String password) {
        this.password = password;
    }
     
     public Utilisateur( String nom, String prenom, String adresse, String email,String password,String type ) {
        this.nom = nom;
        this.prenom = prenom;
        this.adresse = adresse;        
        this.email = email;        
        this.type = type;
        this.password = password;
    }

    public Date getbirthday() {
        return birthday;
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public void setbirthday(Date birthday) {
        this.birthday = birthday;
    }

    public String getNom() {
        return nom;
    }

    public void setNom(String nom) {
        this.nom = nom;
    }

    public String getPrenom() {
        return prenom;
    }

    public void setPrenom(String prenom) {
        this.prenom = prenom;
    }

    public String getAdresse() {
        return adresse;
    }

    public void setAdresse(String adresse) {
        this.adresse = adresse;
    }

    public String getEmail() {
        return email;
    }

    public void setEmail(String email) {
        this.email = email;
    }

    public String getType() {
        return type;
    }

    public void setType(String type) {
        this.type = type;
    }
}
