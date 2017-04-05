using UnityEngine;
using System.Collections;

public abstract class character : MonoBehaviour {

	protected Animator playerAnimator;

	public Animator enemyAnimator { get; private set; }

	[SerializeField] //SerializedField so it can be edited in inspector, however not accessed by other scripts
	protected float movementSpeed;

	protected bool facingRight; //protected allows classes that inherit from this script, access the variables

	public bool Attack { get; set;}

	protected bool attack;

	// Use this for initialization
	public virtual void Start () {


		facingRight = true;
		playerAnimator = GetComponent<Animator> ();
		enemyAnimator = GetComponent<Animator> ();
	}
	
	// Update is called once per frame
	void Update () {
	
	}

	public void changeDirection () 
	{
		facingRight = !facingRight;

		transform.localScale = new Vector3(transform.localScale.x * -1,1,1);

	}
}
