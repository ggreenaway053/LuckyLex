using UnityEngine;
using UnityEngine.UI;
using System.Collections;

public class menuScript : MonoBehaviour {

	public Canvas settingsMenu;
	public Button startText;
	public Button settingsText;
	public Button controlsText;
	public Canvas controlsMenu;


	// Use this for initialization
	void Start () {

		controlsMenu = controlsMenu.GetComponent<Canvas> ();
		settingsMenu = settingsMenu.GetComponent<Canvas> ();
		startText = startText.GetComponent<Button> ();
		settingsText = settingsText.GetComponent<Button> ();
		controlsText = controlsText.GetComponent<Button> ();

		controlsMenu.enabled = false;
		settingsMenu.enabled = false;

	}

	public void ControlsPress()
	{
		controlsMenu.enabled = true;
		settingsMenu.enabled = false;
		startText.enabled = false;
		settingsText.enabled = false;
	}
		
	public void SettingsPress(){
		controlsMenu.enabled = false;
		settingsMenu.enabled = true;
		startText.enabled = false;
		settingsText.enabled = false;

	}

	public void BackPress() {
		settingsMenu.enabled = false;
		startText.enabled = true;
		settingsText.enabled = true;
		controlsMenu.enabled = false;
	}
		


	public void StartLevel(){

		Application.LoadLevel (1);

	}

}
