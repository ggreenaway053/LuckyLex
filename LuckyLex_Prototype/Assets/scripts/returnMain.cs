using UnityEngine;
using System.Collections;
using UnityEngine.UI;

public class returnMain : MonoBehaviour {


	public Button backToMenu;

	// Use this for initialization
	void Start()
	{

		backToMenu = backToMenu.GetComponent<Button> ();
	}

	public void BackToMain()

	{
		Application.LoadLevel (0);
	}
}
