package com.matischill.cinema.friendscinema;

import android.annotation.TargetApi;
import android.app.Fragment;
import android.os.AsyncTask;
import android.os.Build;
import android.os.Bundle;
import android.os.Handler;
import android.support.v4.view.ViewPager;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.MotionEvent;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.TextView;

import com.google.gson.internal.StringMap;
import com.matischill.cinema.friendscinema.adapter.ImageSlideAdapter;
import com.matischill.cinema.friendscinema.model.FilmModel;
import com.matischill.cinema.friendscinema.utils.CirclePageIndicator;
import com.matischill.cinema.friendscinema.utils.PageIndicator;

import org.springframework.http.converter.json.GsonHttpMessageConverter;
import org.springframework.web.client.RestClientException;
import org.springframework.web.client.RestTemplate;

import java.util.ArrayList;
import java.util.List;

/**
 * Created by Djinodji on 2/19/2016.
 */
@TargetApi(Build.VERSION_CODES.HONEYCOMB)
public class HomeFragment extends Fragment {
    List<FilmModel> films=new ArrayList<FilmModel>();
    private ViewPager mViewPager;
    TextView filmName;
    Button ib;
    PageIndicator mIndicator;
    private Runnable animateViewPager;
    private Handler handler = new Handler();
    private static final long ANIM_VIEWPAGER_DELAY = 8000;
    private static final long ANIM_VIEWPAGER_DELAY_USER_VIEW = 12000;
    boolean stopSliding = false;

    public HomeFragment(){}

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {

        View rootView = inflater.inflate(R.layout.fragment_home, container, false);
        mViewPager = (ViewPager) rootView.findViewById(R.id.view_pager);

        ib=(Button)rootView.findViewById(R.id.inscriptionButton);
        ib.setVisibility(View.GONE);


        mViewPager.setOnTouchListener(new View.OnTouchListener() {
            private boolean moved;

            @Override
            public boolean onTouch(View v, MotionEvent event) {
                switch (event.getAction()) {

                    case MotionEvent.ACTION_CANCEL:
                        break;

                    case MotionEvent.ACTION_UP:
                        // calls when touch release on ViewPager
                        if (films != null && films.size() != 0) {
                            stopSliding = false;
                            runnable(films.size());
                            handler.postDelayed(animateViewPager,
                                    ANIM_VIEWPAGER_DELAY_USER_VIEW);
                        }
                        break;

                    case MotionEvent.ACTION_MOVE:
                        // calls when ViewPager touch
                        if (handler != null && stopSliding == false) {
                            stopSliding = true;
                            handler.removeCallbacks(animateViewPager);
                        }
                        break;
                }


                return false;
            }
        });

        mIndicator = (CirclePageIndicator) rootView.findViewById(R.id.indicator);
        filmName = (TextView) rootView.findViewById(R.id.img_name);
        filmName.setSingleLine(false);
        //filmName.setTextColor(getResources().getColor(R.color.colorPrimaryDark));
        mIndicator.setOnPageChangeListener(new PageChangeListener());


        new HttpRequestTask().execute();





            //mViewPager.setPageMarginDrawable(R.color.colorPrimary);
            return rootView;
        }



    public void runnable(final int size) {
        handler = new android.os.Handler();
        animateViewPager = new Runnable() {
            public void run() {
                if (!stopSliding) {
                    if (mViewPager.getCurrentItem() == size - 1) {
                        mViewPager.setCurrentItem(0);
                    } else {
                        mViewPager.setCurrentItem(
                                mViewPager.getCurrentItem() + 1, true);
                    }
                    handler.postDelayed(animateViewPager, ANIM_VIEWPAGER_DELAY);
                }
            }
        };
    }
    private class PageChangeListener implements ViewPager.OnPageChangeListener {

        @Override
        public void onPageScrolled(int position, float positionOffset, int positionOffsetPixels) {

        }

        @Override
        public void onPageSelected(int position) {

        }

        @Override
        public void onPageScrollStateChanged(int state) {
            if (state == ViewPager.SCROLL_STATE_IDLE) {
                if (films != null) {
                    FilmModel ci=films.get(mViewPager.getCurrentItem());

                    filmName.setText(ci.getName() + "\n" + ci.getDate() + "\n" + ci.getPrice() + " €" + "\n" + (ci.getMax_place() > 1 ? ci.getMax_place() + " Places" : ci.getMax_place() + " Place"));


                    //  + ((Photo) products.get(mViewPager
                    //  .getCurrentItem())).getName());
                }
            }
        }

    }


    private class HttpRequestTask extends AsyncTask<Void, Void, Object> {
        @Override
        protected Object doInBackground(Void... params) throws RestClientException {
            try {
                final String url = "http://project-group-4.estiam.com/app_dev.php/api/sessions";
                RestTemplate restTemplate = new RestTemplate();
                try {
                    restTemplate.getMessageConverters().add(new GsonHttpMessageConverter());
                }
                catch (Exception e)
                {
                    String j=e.getMessage();
                }
                Object greeting = null;

                    greeting = restTemplate.getForObject(url, Object.class);

                return greeting;
            } catch (Exception e) {
                Log.e("MainActivity", e.getMessage(), e);
            }
            return null;
        }

        @Override
        protected void onPostExecute(Object session) {
            //TextView greetingIdText = (TextView) findViewById(R.id.id_value);
            //TextView greetingContentText = (TextView) findViewById(R.id.content_value);
            //greetingIdText.setText(session.getId());
            //greetingContentText.setText(session.getContent());
            //final ObjectMapper mapper = new ObjectMapper(); // jackson's objectmapper

            List<StringMap> sessions =(List<StringMap>)session;
            for(int g=0; g<sessions.size(); g++) {
                StringMap v = sessions.get(g);
                Session s= new Session();

                s.setDate(v.get("date").toString());

                FilmModel f= new FilmModel();
                StringMap film=  (StringMap) v.get("film");
                f.setImageUrl(film.get("poster").toString());
                f.setName(film.get("title").toString());
                f.setDescription(film.get("actors").toString());
                String id=film.get("id").toString();

                f.setPrice(Long.parseLong(v.get("price").toString().substring(0, v.get("price").toString().indexOf("."))));
                f.setDate(v.get("date").toString());


                f.setMax_place(Long.parseLong(v.get("max_place").toString().substring(0, v.get("max_place").toString().indexOf("."))));
                f.setId(Integer.parseInt(id.substring(0, id.indexOf("."))));

                films.add(f);
            }

            getActivity().runOnUiThread(new Runnable() {
                @Override
                public void run() {

                    mViewPager.setAdapter(new ImageSlideAdapter(getActivity(), films,
                            HomeFragment.this));

                    mIndicator.setViewPager(mViewPager);
                    if (films.size()>0) {
                        FilmModel ci=films.get(mViewPager.getCurrentItem());

                        filmName.setText(ci.getName()+"\n"+ci.getDate()+"\n"+ci.getPrice()+" €"+"\n"+(ci.getMax_place()>1?ci.getMax_place()+" Places":ci.getMax_place()+" Place"));
                       // imgDescriptionTxt.setText(products.get(mViewPager.getCurrentItem()).getDescription());
                        ib.setVisibility(View.VISIBLE);
                        runnable(films.size());
                        //Re-run callback
                        handler.postDelayed(animateViewPager, ANIM_VIEWPAGER_DELAY);
                    }
                    else {
                        filmName.setText("Aucun film");
                    }
                }
            });

        }

    }

}
