package com.matischill.cinema.friendscinema;

import android.os.Parcel;
import android.os.Parcelable;

/**
 * Created by Djinodji on 3/13/2016.
 */
public class FilmToShow implements Parcelable {private int id;

    private String name;
    private String description;
    private String imageUrl;

    public FilmToShow() {
        super();
    }

    public String getDescription() {
        return description;
    }

    public void setDescription(String description) {
        this.description = description;
    }

    private FilmToShow(Parcel in) {
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

    public static final Parcelable.Creator<FilmToShow> CREATOR = new Parcelable.Creator<FilmToShow>() {
        public FilmToShow createFromParcel(Parcel in) {
            return new FilmToShow(in);
        }

        public FilmToShow[] newArray(int size) {
            return new FilmToShow[size];
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

    public static Parcelable.Creator<FilmToShow> getCreator() {
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
        FilmToShow other = (FilmToShow) obj;
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
