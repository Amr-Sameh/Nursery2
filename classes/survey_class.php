<?php

/**
 * Created by PhpStorm.
 * User: meir
 * Date: 26/04/17
 * Time: 10:15 ص
 */
include "survey_query.php";

class survey
{

	private $deadline;
    private $survey_title;
    private $survey_content;
    private $survey_option;
	public function __construct()
    {
        $this->survey_query=new survey_query();
    }

    







    public setDeadline($deadline)
    {
        $this->deadline = $deadline;
    }
    public setSurveyTitle($survey_title)
    {
        $this->survey_title = $survey_title;
    }
    public setSurveyContent($survey_content)
    {
        $this->survey_content = $survey_content;
    }
    public setSurveyOption($survey_option)
    {
        $this->survey = $survey_option;
    }
    public getDeadline(){
        return $this->deadline;
    }
    public getSurveyTitle()
    {
        return $this->survey_title;
    }
    public getSurveyContent()
    {
        return $this->survey_content;
    }
    public getSurveyOption(){
        return $ths->survey_option;
    }
}