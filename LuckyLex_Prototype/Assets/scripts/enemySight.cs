using UnityEngine;
using System.Collections;

public class enemySight : MonoBehaviour {

	[SerializeField]
	private enemy enemy;

	void OnTriggerEnter2D(Collider2D other)
	{
		if (other.tag == "Player") 
		{
			enemy.Target = other.gameObject;
		}
	}

	void OnTriggerExit2D (Collider2D other)
	{
		if (other.tag == "Player") 
		{
			enemy.Target = null;
		}
	}
}
