package com.matischill.cinema.friendscinema;

import java.io.Serializable;

/**
 * Created by Djinodji on 3/13/2016.
 */
public class Genre implements Serializable {

    private  int id;
    private  String title;

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getTitle() {
        return title;
    }

    public void setTitle(String title) {
        this.title = title;
    }
}
