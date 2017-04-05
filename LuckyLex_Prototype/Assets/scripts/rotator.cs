using UnityEngine;
using System.Collections;

public class rotator : MonoBehaviour {

	void Update ()

	{
		transform.Rotate (new Vector2 (0, 45) * Time.deltaTime);

	}


}
