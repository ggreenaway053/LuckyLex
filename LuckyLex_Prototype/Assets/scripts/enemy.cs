using UnityEngine;
using System.Collections;

public class enemy : character {

	private IEnemyState currentState;

	public GameObject Target { get; set;}

	[SerializeField]
	private float meleeRange;

	public bool InAttackRange
	{
		get 
		{
			if (Target != null)
			{
				return Vector2.Distance (transform.position, Target.transform.position) < meleeRange;
			}

			return false;

		}
	}



	// Use this for initialization
	public override void Start () {

		base.Start ();
		ChangeState(new IdleState());
	
	}
	
	// Update is called once per frame
	void Update () {


			currentState.Execute ();
			LookAtPlayer ();

	}


	private void LookAtPlayer()

	{
		
		if (Target != null) 
		{
			float xDir = Target.transform.position.x - transform.position.x;

			if (xDir < 0 && facingRight || xDir > 0 && !facingRight) 
			{
				changeDirection ();
			}
		}
	}
		

	public void ChangeState(IEnemyState newState)
	{
		if (currentState != null) 
		{
			currentState.Exit ();
		}

		currentState = newState;

		currentState.Enter (this);
	}


	public void MoveEnemy()
	{
		enemyAnimator.SetFloat ("speed", 1);

		transform.Translate (GetDirection() * (movementSpeed * Time.deltaTime), Space.World);
	}

	public Vector2 GetDirection()
	{
		return facingRight ? Vector2.right : Vector2.left;
	}



}
