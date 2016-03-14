package com.matischill.cinema.friendscinema;

import android.annotation.TargetApi;
import android.app.ProgressDialog;
import android.content.Intent;
import android.os.AsyncTask;
import android.os.Build;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;

import org.springframework.http.converter.json.GsonHttpMessageConverter;
import org.springframework.web.client.RestClientException;
import org.springframework.web.client.RestTemplate;

/**
 * Created by Djinodji on 3/14/2016.
 */
public class LoginActivity extends AppCompatActivity {
    private String password;
    private String loginTxt;
    ProgressDialog mProgressDialog;
    @TargetApi(Build.VERSION_CODES.ICE_CREAM_SANDWICH)
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

        final Button login =(Button)findViewById(R.id.loginButton);
        login.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                mProgressDialog = ProgressDialog.show(LoginActivity.this, "Connexion en cours",
                        "Veuiller patienter", true);

                new Thread((new Runnable() {
                    @Override
                    public void run() {
                    }
                })).start();
                TextView lg=(TextView) findViewById(R.id.usernameTxt);
                loginTxt =lg.getText().toString();

                TextView ps=(TextView) findViewById(R.id.passTxt);
                password =lg.getText().toString();
                new HttpRequestTask().execute();

            }
        });


    }



    private class HttpRequestTask extends AsyncTask<Void, Void, Object> {
        @Override
        protected Object doInBackground(Void... params) throws RestClientException {
            try {
                final String url = "http://project-group-4.estiam.com/app_dev.php/api/users/check_session/username="+loginTxt+"&password="+password;
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


            if (session!=null) {
                mProgressDialog.dismiss();
                Intent intent;
                intent = new Intent(LoginActivity.this, MainActivity.class);

                startActivity(intent);

            }
            else
            {
                TextView error=(TextView)findViewById(R.id.errorTxt);
                error.setText("Erreur nom d'utilisateur ou mot de passe");
                mProgressDialog.dismiss();
            }

        }

    }
}
