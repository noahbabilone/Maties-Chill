package com.matischill.cinema.friendscinema;

import android.annotation.TargetApi;
import android.app.Fragment;
import android.os.Build;
import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;

/**
 * Created by Djinodji on 2/19/2016.
 */
@TargetApi(Build.VERSION_CODES.HONEYCOMB)
public class FindPeopleFragment extends Fragment {


    public FindPeopleFragment(){}
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {

        View rootView = inflater.inflate(R.layout.fragment_findpeople, container, false);

        return rootView;
    }
}
