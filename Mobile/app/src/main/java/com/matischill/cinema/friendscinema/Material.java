package com.matischill.cinema.friendscinema;

import java.io.Serializable;

/**
 * Created by Djinodji on 3/13/2016.
 */
public  class Material implements Serializable{
    public  long id;
    public  String description;
    public  Type_material type_material;
    public  User user;

    public long getId() {
        return id;
    }

    public void setId(long id) {
        this.id = id;
    }

    public String getDescription() {
        return description;
    }

    public void setDescription(String description) {
        this.description = description;
    }

    public Type_material getType_material() {
        return type_material;
    }

    public void setType_material(Type_material type_material) {
        this.type_material = type_material;
    }

    public User getUser() {
        return user;
    }

    public void setUser(User user) {
        this.user = user;
    }
}