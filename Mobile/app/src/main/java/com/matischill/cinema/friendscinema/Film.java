package com.matischill.cinema.friendscinema;

import java.io.Serializable;
import java.util.List;

/**
 * Created by Djinodji on 3/13/16.
 */
public class Film implements Serializable {
    private   long id;
    private  String _i_s_a_n;
    private  String title;
    private  String release_date;
    private  String directors;
    private  String actors;
    private  String nationality;
    private  long runtime;
    private  long age_limit;
    private  long press_rating;
    private  double user_rating;
    private  String link;
    private  String poster;
    private  String synopsis;
    private List<Genre> genre;


    public long getId() {
        return id;
    }

    public void setId(long id) {
        this.id = id;
    }

    public String get_i_s_a_n() {
        return _i_s_a_n;
    }

    public void set_i_s_a_n(String _i_s_a_n) {
        this._i_s_a_n = _i_s_a_n;
    }

    public String getTitle() {
        return title;
    }

    public void setTitle(String title) {
        this.title = title;
    }

    public String getRelease_date() {
        return release_date;
    }

    public void setRelease_date(String release_date) {
        this.release_date = release_date;
    }

    public String getDirectors() {
        return directors;
    }

    public void setDirectors(String directors) {
        this.directors = directors;
    }

    public String getActors() {
        return actors;
    }

    public void setActors(String actors) {
        this.actors = actors;
    }

    public String getNationality() {
        return nationality;
    }

    public void setNationality(String nationality) {
        this.nationality = nationality;
    }

    public long getRuntime() {
        return runtime;
    }

    public void setRuntime(long runtime) {
        this.runtime = runtime;
    }

    public long getAge_limit() {
        return age_limit;
    }

    public void setAge_limit(long age_limit) {
        this.age_limit = age_limit;
    }

    public long getPress_rating() {
        return press_rating;
    }

    public void setPress_rating(long press_rating) {
        this.press_rating = press_rating;
    }

    public double getUser_rating() {
        return user_rating;
    }

    public void setUser_rating(double user_rating) {
        this.user_rating = user_rating;
    }

    public String getLink() {
        return link;
    }

    public void setLink(String link) {
        this.link = link;
    }

    public String getPoster() {
        return poster;
    }

    public void setPoster(String poster) {
        this.poster = poster;
    }

    public String getSynopsis() {
        return synopsis;
    }

    public void setSynopsis(String synopsis) {
        this.synopsis = synopsis;
    }

    public List<Genre> getGenre() {
        return genre;
    }

    public void setGenre(List<Genre> genre) {
        this.genre = genre;
    }
}