package com.matischill.cinema.friendscinema;

import java.io.Serializable;

/**
 * Created by Djinodji on 3/13/16.
 */
public class Session implements Serializable {
    private long id;
    private String date;
    private String type_view;
    private String description;
    private String contribution;
    private long price;
    private long max_place;
    private Address address;
    private Material material[];
    private Modality modality;
    private Film film;
    private User user;

    public long getId() {
        return id;
    }

    public void setId(long id) {
        this.id = id;
    }

    public String getDate() {
        return date;
    }

    public void setDate(String date) {
        this.date = date;
    }

    public String getType_view() {
        return type_view;
    }

    public void setType_view(String type_view) {
        this.type_view = type_view;
    }

    public String getDescription() {
        return description;
    }

    public void setDescription(String description) {
        this.description = description;
    }

    public String getContribution() {
        return contribution;
    }

    public void setContribution(String contribution) {
        this.contribution = contribution;
    }

    public long getPrice() {
        return price;
    }

    public void setPrice(long price) {
        this.price = price;
    }

    public long getMax_place() {
        return max_place;
    }

    public void setMax_place(long max_place) {
        this.max_place = max_place;
    }

    public Address getAddress() {
        return address;
    }

    public void setAddress(Address address) {
        this.address = address;
    }

    public Material[] getMaterial() {
        return material;
    }

    public void setMaterial(Material[] material) {
        this.material = material;
    }

    public Modality getModality() {
        return modality;
    }

    public void setModality(Modality modality) {
        this.modality = modality;
    }

    public Film getFilm() {
        return film;
    }

    public void setFilm(Film film) {
        this.film = film;
    }

    public User getUser() {
        return user;
    }

    public void setUser(User user) {
        this.user = user;
    }
}