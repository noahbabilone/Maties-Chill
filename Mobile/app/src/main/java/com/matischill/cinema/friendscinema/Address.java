package com.matischill.cinema.friendscinema;

import java.io.Serializable;

/**
 * Created by Djinodji on 3/13/2016.
 */
public   class Address implements Serializable {
    private   long id;
    private  String title;
    private  String street;
    private  String front_door;
    private  String floor;
    private  String building;
    private  String address;
    private  String adress2;
    private  String phone;
    private  long post_code;
    private  String town;

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

    public String getStreet() {
        return street;
    }

    public void setStreet(String street) {
        this.street = street;
    }

    public String getFront_door() {
        return front_door;
    }

    public void setFront_door(String front_door) {
        this.front_door = front_door;
    }

    public String getFloor() {
        return floor;
    }

    public void setFloor(String floor) {
        this.floor = floor;
    }

    public String getBuilding() {
        return building;
    }

    public void setBuilding(String building) {
        this.building = building;
    }

    public String getAddress() {
        return address;
    }

    public void setAddress(String address) {
        this.address = address;
    }

    public String getAdress2() {
        return adress2;
    }

    public void setAdress2(String adress2) {
        this.adress2 = adress2;
    }

    public String getPhone() {
        return phone;
    }

    public void setPhone(String phone) {
        this.phone = phone;
    }

    public long getPost_code() {
        return post_code;
    }

    public void setPost_code(long post_code) {
        this.post_code = post_code;
    }

    public String getTown() {
        return town;
    }

    public void setTown(String town) {
        this.town = town;
    }
}