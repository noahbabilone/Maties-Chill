package com.matischill.cinema.friendscinema;

import java.io.Serializable;

/**
 * Created by Djinodji on 3/13/2016.
 */
public   class Type_material implements Serializable {
    public  long id;
    public  String title;

    public long getId() {
        return id;
    }

    public void setId(long id) {
        this.id = id;
    }

    public String getTitle() {
        return title;
    }

    public void setTitle(String title) {
        this.title = title;
    }
}

