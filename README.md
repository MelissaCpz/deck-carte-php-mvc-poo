# Projet PHP MVC POO

## 🚀 Stack utilisée

- **PHP**
- **Architecture MVC**
- **Programmation Orientée Objet (POO)**
- **PhpMyAdmin** (gestion de la base de données)

---

## 🧭 Fonctionnalités principales

### 🔐 Gestion utilisateur
- Inscription  
- Connexion  
- Déconnexion  
- Suppression de compte  

### 🛡️ Gestion des rôles et permissions
- **User**
  - Peut consulter la liste des personnages  
- **Creator**
  - Peut créer des personnages  
  - Peut modifier et supprimer **uniquement ses propres créations**  
- **Admin**
  - Accès complet : création, modification et suppression de tous les personnages  

---

## 👤 Comptes de démonstration

Pour tester les différents rôles :

### 🔸 Admin
- Identifiant : `userMan`  
- Mot de passe : `123`

### 🔸 Creator
- Identifiant : `creatorMan`  
- Mot de passe : `123`

### 🔸 User
- Identifiant : `adminWoman`  
- Mot de passe : `123`

> ⚠️ Tous les mots de passe sont hashés en base de données.  
> Ces comptes sont uniquement destinés à la démonstration.

---

## 📌 Étapes possibles dans l'application

- S’enregistrer  
- Se connecter  
- Se déconnecter  
- Supprimer son compte  
- Consulter la liste des personnages crés (accéssible par tous : User, Creator, Admin)  
- Créer un personnage (Uniquement : Creator, Admin)  
- Modifier ou supprimer **ses propres** personnages (Creator)  
- Modifier ou supprimer **tous** les personnages (Admin)

---

## 🔧 Axes d'amélioration

- Renforcer la sécurisation des mots de passe  
- Rendre les noms d’utilisateurs sensibles à la casse  
- Ajouter des flash messages (succès / erreur)  
- Permettre de visiter le profil d’un autre utilisateur et voir sa collection  
- Ajouter une section commentaires  
- Ajouter une barre de recherche (personnage, classe, joueur…)
- Pourvoir télécharger et ajouter ses propres images/photos
- Amélioration visuel


