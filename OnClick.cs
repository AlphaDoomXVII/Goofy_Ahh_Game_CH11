using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class OnClick : MonoBehaviour
{

    public GameObject onClickPopup;
    private bool isPanelVisible = false;

    public void Click()
    {
        isPanelVisible = !isPanelVisible;
        onClickPopup.SetActive(isPanelVisible);
    }


}