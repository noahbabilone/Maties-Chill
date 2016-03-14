package com.matischill.cinema.friendscinema.model;

import android.os.Parcel;
import android.os.Parcelable;

/**
 * Created by Djinodji on 3/11/2016.
 */
public class FilmModel implements Parcelable {private int id;

    private String name;
    private String description;
    private String imageUrl;
    private String date;
    private String type_view;
    private String contribution;
    private long price;
    private long max_place;


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

    public static Creator<FilmModel> getCREATOR() {
        return CREATOR;
    }

    public FilmModel() {
        super();
    }

    public String getDescription() {
        return description;
    }

    public void setDescription(String description) {
        this.description = description;
    }

    private FilmModel(Parcel in) {
        super();
        this.id = in.readInt();
        this.name = in.readString();
        this.imageUrl = in.readString();
    }

    @Override
    public int describeContents() {
        return 0;
    }

    @Override
    public void writeToParcel(Parcel parcel, int flags) {
        parcel.writeInt(getId());
        parcel.writeString(getName());
        parcel.writeString(getImageUrl());
    }

    public static final Parcelable.Creator<FilmModel> CREATOR = new Parcelable.Creator<FilmModel>() {
        public FilmModel createFromParcel(Parcel in) {
            return new FilmModel(in);
        }

        public FilmModel[] newArray(int size) {
            return new FilmModel[size];
        }
    };

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public String getImageUrl() {
        return imageUrl;
    }

    public void setImageUrl(String imageUrl) {
        this.imageUrl = imageUrl;
    }

    public static Parcelable.Creator<FilmModel> getCreator() {
        return CREATOR;
    }

    @Override
    public int hashCode() {
        final int prime = 31;
        int result = 1;
        result = prime * result + id;
        return result;
    }

    @Override
    public boolean equals(Object obj) {
        if (this == obj)
            return true;
        if (obj == null)
            return false;
        if (getClass() != obj.getClass())
            return false;
        FilmModel other = (FilmModel) obj;
        if (id != other.id)
            return false;
        return true;
    }

    @Override
    public String toString() {
        return "Photo [id=" + id + ", name=" + name + ", imageUrl="
                + imageUrl + "]";
    }
}
